<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('customer_behaviors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // 10 Fitur ML
            $table->string('plan_type');
            $table->string('device_brand');
            $table->double('avg_data_usage_gb', 8, 2);
            $table->double('pct_video_usage', 5, 2);
            $table->double('avg_call_duration', 8, 2);
            $table->integer('sms_freq');
            $table->double('monthly_spend', 15, 2);
            $table->integer('topup_freq');
            $table->double('travel_score', 4, 2);
            $table->integer('complaint_count');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_behaviors');
    }
};
