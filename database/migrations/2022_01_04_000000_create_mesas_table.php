<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesasTable extends Migration
{
    public function up()
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->string('numero_mesa');
            $table->enum('tipo', ['interior', 'terraza']);
            $table->unsignedInteger('asientos');
            $table->boolean('disponible')->default(true);
            $table->decimal('cuenta_total', 8, 2)->default(0.00);
            $table->foreignId('camarero_id')->nullable()->constrained('camareros')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mesas');
    }
}
