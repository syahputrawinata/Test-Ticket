<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->notNullable();
            $table->string('email')->notNullable();
            $table->string('title')->notNullable();
            $table->text('description')->nullable();
            $table->date('assign_at')->nullable();
            $table->foreignId('ticket_type_id')->constrained('ticket_types')->cascadeOnUpdate();
            $table->string('status');
            $table->foreignId('project_id')->constrained('projects')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
