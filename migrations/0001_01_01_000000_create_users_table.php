<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    private $schema;

    /**
     * Use custom connection for these tables to ensure that they
     * don't get reset when we version our data using prefixes.
     */
    public function __construct()
    {
        $this->schema = Schema::connection('userdata');
    }

    public function up()
    {
        $this->schema->create('users', function (Blueprint $table) {
            $table->id();
            // not used for authentication. it's just here for us admins!
            $table->text('username')->nullable();
            // hashed tokens are sha256, i.e. 64-digit hex numbers
            $table->string('api_token', 64)->unique()->nullable();
            $table->timestamps();
        });


        $this->schema->create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        $this->schema->create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down()
    {
        $this->schema->dropIfExists('users');
        $this->schema->dropIfExists('password_reset_tokens');
        $this->schema->dropIfExists('sessions');
    }
}
