<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number')->nullable(); // رقم المنتج
            $table->text('description')->nullable(); // الوصف
            $table->decimal('unit_price', 8, 2)->default(0); // السعر
            $table->tinyInteger('is_discount_active')->default(1); // تفعيل الخصم
            $table->decimal('price_after_discount', 8, 2)->default(0); // السعر بعد الخصم
            $table->tinyInteger('discount')->default(0); // نسبة الخصم
            $table->date('start_date')->nullable(); // تاريخ بداية الخصم
            $table->date('end_date')->nullable(); // تاريخ نهايةالخصم
            $table->Integer('quantity')->default(0); // الكمية الموجودة
            $table->Integer('quantity_sold')->default(0); // الكمية الموجودة
            $table->tinyInteger('show_quantity')->default(0); // عرض الكمية
            $table->Integer('max_orders')->default(0); // اقصى كمية لكل عميل
            $table->Integer('weight')->default(0); // الوزن
            $table->string('seo_keywords')->nullable(); // SEO
            $table->bigInteger('measurement_id')->default(0); // وحدة القياس مثل (كيلو - زجاجة - جرام - علبة - الخ...)
            $table->Integer('weight')->default(0); // الوزن
            $table->Integer('favorite')->default(0);
            $table->bigInteger('brand_id')->default(0); // الماركة
            $table->tinyInteger('is_shipping')->default(0); // شحن المنتج
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_tax')->default(0); // هل شامل الضريبة
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
        Schema::dropIfExists('products');
    }
}
