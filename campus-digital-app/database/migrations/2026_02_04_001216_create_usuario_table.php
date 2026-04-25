<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre', 120)->default('');
            $table->string('apellido', 120)->default('');
            $table->string('telefono', 30)->default('');
            $table->text('foto_url')->default('');
            $table->text('password_hash')->nullable(false);
            
            $table->boolean('email_verificado')->default(false);
            $table->timestampTz('ultimo_login_at')->nullable();
            $table->boolean('bloqueado')->default(false);
            $table->timestampTz('bloqueado_hasta')->nullable();
            $table->text('seguridad_json')->default('{}');
            
            $table->string('email')->unique()->nullable(false);
            
            $table->timestampTz('created_at')->useCurrent();
            $table->timestampTz('updated_at')->useCurrent();
            $table->timestampTz('deleted_at')->nullable();
        });

        Schema::table('usuario', function (Blueprint $table) {
            $table->index('email', 'idx_usuario__email');
            $table->index('bloqueado', 'idx_usuario__bloqueado');
            $table->index('email_verificado', 'idx_usuario__email_verificado');
            $table->index('deleted_at', 'idx_usuario__deleted_at');
        });

        if (DB::getDriverName() === 'pgsql') {
            DB::unprepared('
                CREATE TRIGGER trg_usuario__set_updated_at
                BEFORE UPDATE ON usuario
                FOR EACH ROW EXECUTE FUNCTION set_updated_at();
            ');
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() === 'pgsql') {
            DB::unprepared('DROP TRIGGER IF EXISTS trg_usuario__set_updated_at ON usuario');
        }
        Schema::dropIfExists('usuario');
    }
};