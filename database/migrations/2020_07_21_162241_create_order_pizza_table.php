<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPizzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_pizza', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger("pizza_id");
            $table->unsignedBigInteger("order_id");
            $table->integer("amount_order");
            $table->foreign("pizza_id")->references("id")->on("pizzas")->onDelete("cascade");
            $table->foreign("order_id")->references("id")->on("orders")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_pizza');
    }
}
