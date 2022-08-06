<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKiakooV2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('log_name')->nullable()->index();
            $table->text('description');
            $table->string('subject_type')->nullable();
            $table->string('event')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('causer_type')->nullable();
            $table->unsignedBigInteger('causer_id')->nullable();
            $table->longText('properties')->nullable();
            $table->char('batch_uuid', 36)->nullable();
            $table->timestamps();

            $table->index(['subject_type', 'subject_id'], 'subject');
            $table->index(['causer_type', 'causer_id'], 'causer');
        });

        Schema::create('brands', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100)->unique('name');
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('human_id')->index('human_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('user_type')->nullable();
            $table->string('platform')->nullable();
            $table->string('platform_version')->nullable();
            $table->string('browser')->nullable();
            $table->string('browser_version')->nullable();
            $table->boolean('is_desktop')->default(false);
            $table->boolean('is_mobile')->default(false);
            $table->string('language')->nullable();
            $table->boolean('is_trusted')->default(false)->index();
            $table->boolean('is_untrusted')->default(false)->index();
            $table->timestamps();
        });

        Schema::create('discounts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discountable_id');
            $table->string('discountable_type');
            $table->integer('quantity');
            $table->integer('quantity_used')->default(0);
            $table->integer('amount');
            $table->timestamp('expires_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedBigInteger('user_id')->index('user_id');
            $table->integer('human_id')->index('human_id');
            $table->integer('work_id')->index('work_id');
            $table->string('phone_number', 40)->unique('phone_number')->comment('ce meme employe peut etre client avec ce meme numéro et cette meme addresse voila pourquoi ces données sont ici et non dans table humans');
            $table->string('address')->nullable();
            $table->string('temporary_password', 10)->nullable();
            $table->boolean('password_changed')->default(false);
            $table->boolean('authorized_to_log_in');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('genders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 50);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('humans', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('gender_id')->index('gender_id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('logins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_address', 45);
            $table->string('type')->default('auth');
            $table->unsignedBigInteger('user_id');
            $table->string('user_type')->nullable();
            $table->unsignedBigInteger('device_id')->nullable()->index();
            $table->timestamps();
        });

        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->char('uuid', 36)->nullable()->unique();
            $table->string('collection_name');
            $table->string('name');
            $table->string('file_name');
            $table->string('mime_type')->nullable();
            $table->string('disk');
            $table->string('conversions_disk')->nullable();
            $table->unsignedBigInteger('size');
            $table->longText('manipulations');
            $table->longText('custom_properties');
            $table->longText('generated_conversions');
            $table->longText('responsive_images');
            $table->unsignedInteger('order_column')->nullable()->index();
            $table->timestamps();

            $table->index(['model_type', 'model_id']);
        });

        Schema::create('model_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');

            $table->index(['model_id', 'model_type']);
            $table->primary(['permission_id', 'model_id', 'model_type']);
        });

        Schema::create('model_has_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');

            $table->index(['model_id', 'model_type']);
            $table->primary(['role_id', 'model_id', 'model_type']);
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('type');
            $table->string('notifiable_type');
            $table->unsignedBigInteger('notifiable_id');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            $table->index(['notifiable_type', 'notifiable_id']);
        });

        Schema::create('packings', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        Schema::create('product_property', function (Blueprint $table) {
            $table->integer('product_id')->index('product_id');
            $table->integer('property_id')->index('property_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('product_property_value', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('property_value_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->unique(['product_id', 'property_value_id'], 'product_id');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('taxon_child_id')->index('taxon_child_id');
            $table->integer('brand_id')->index('brand_id');
            $table->string('name')->unique('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('promocode_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('promocode_user_user_id_foreign');
            $table->unsignedBigInteger('promocode_id')->index('promocode_user_promocode_id_foreign');
            $table->timestamp('used_at')->useCurrentOnUpdate()->useCurrent();
        });

        Schema::create('promocodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 32)->unique('code');
            $table->double('reward', 10, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->text('data')->nullable();
            $table->boolean('is_disposable')->default(false);
            $table->timestamp('expires_at')->nullable();
        });

        Schema::create('properties', function (Blueprint $table) {
            $table->integer('id', true);
            $table->boolean('is_technical')->default(false);
            $table->string('name')->unique('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('property_value_variation', function (Blueprint $table) {
            $table->integer('property_value_id');
            $table->integer('variation_id')->index('variation_id');
            $table->integer('property_id')->index('property_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->unique(['property_value_id', 'variation_id', 'property_id'], 'property_value_id');
        });

        Schema::create('property_values', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('property_id')->index('property_id');
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id')->index('role_has_permissions_role_id_foreign');

            $table->primary(['permission_id', 'role_id']);
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        Schema::create('states', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('taxon_children', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('taxon_id')->index('taxon_id');
            $table->string('name')->unique('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('taxonomies', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name')->unique('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('taxons', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('taxonomy_id')->index('taxonomy_id');
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->boolean('user_type')->nullable()->comment('1 = employé ;
2 = client');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->unique(['email', 'user_type'], 'email');
        });

        Schema::create('variations', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('state_id')->index('state_id');
            $table->integer('product_id')->index('product_id');
            $table->integer('packing_id')->index('packing_id');
            $table->string('sku')->unique('sku');
            $table->string('name')->unique('name');
            $table->longText('description')->nullable();
            $table->decimal('price', 12);
            $table->integer('stock')->default(0);
            $table->integer('units_sold')->default(0);
            $table->boolean('is_published')->default(true);
            $table->boolean('picture_changed')->default(false);
            $table->timestamp('last_sale')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('works', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 50);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreign(['human_id'], 'customers_ibfk_1')->references(['id'])->on('humans')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->foreign(['human_id'], 'employees_ibfk_2')->references(['id'])->on('humans')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'employees_ibfk_1')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['work_id'], 'employees_ibfk_3')->references(['id'])->on('works')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('humans', function (Blueprint $table) {
            $table->foreign(['gender_id'], 'humans_ibfk_1')->references(['id'])->on('genders')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('model_has_permissions', function (Blueprint $table) {
            $table->foreign(['permission_id'])->references(['id'])->on('permissions')->onDelete('CASCADE');
        });

        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->foreign(['role_id'])->references(['id'])->on('roles')->onDelete('CASCADE');
        });

        Schema::table('product_property', function (Blueprint $table) {
            $table->foreign(['property_id'], 'product_property_ibfk_2')->references(['id'])->on('properties')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'product_property_ibfk_1')->references(['id'])->on('products')->onDelete('CASCADE');
        });

        Schema::table('product_property_value', function (Blueprint $table) {
            $table->foreign(['property_value_id'], 'product_property_value_ibfk_2')->references(['id'])->on('property_values')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'product_property_value_ibfk_1')->references(['id'])->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign(['brand_id'], 'products_ibfk_3')->references(['id'])->on('brands')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['taxon_child_id'], 'products_ibfk_1')->references(['id'])->on('taxon_children')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('promocode_user', function (Blueprint $table) {
            $table->foreign(['user_id'])->references(['id'])->on('users')->onDelete('CASCADE');
            $table->foreign(['promocode_id'])->references(['id'])->on('promocodes')->onDelete('CASCADE');
        });

        Schema::table('property_value_variation', function (Blueprint $table) {
            $table->foreign(['property_value_id'], 'property_value_variation_ibfk_2')->references(['id'])->on('property_values')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['property_id'], 'property_value_variation_ibfk_1')->references(['id'])->on('properties')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['variation_id'], 'property_value_variation_ibfk_3')->references(['id'])->on('variations')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('property_values', function (Blueprint $table) {
            $table->foreign(['property_id'], 'property_values_ibfk_1')->references(['id'])->on('properties')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->foreign(['role_id'])->references(['id'])->on('roles')->onDelete('CASCADE');
            $table->foreign(['permission_id'])->references(['id'])->on('permissions')->onDelete('CASCADE');
        });

        Schema::table('taxon_children', function (Blueprint $table) {
            $table->foreign(['taxon_id'], 'taxon_children_ibfk_1')->references(['id'])->on('taxons')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('taxons', function (Blueprint $table) {
            $table->foreign(['taxonomy_id'], 'taxons_ibfk_1')->references(['id'])->on('taxonomies')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('variations', function (Blueprint $table) {
            $table->foreign(['state_id'], 'variations_ibfk_2')->references(['id'])->on('states')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'variations_ibfk_1')->references(['id'])->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['packing_id'], 'variations_ibfk_3')->references(['id'])->on('packings')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variations', function (Blueprint $table) {
            $table->dropForeign('variations_ibfk_2');
            $table->dropForeign('variations_ibfk_1');
            $table->dropForeign('variations_ibfk_3');
        });

        Schema::table('taxons', function (Blueprint $table) {
            $table->dropForeign('taxons_ibfk_1');
        });

        Schema::table('taxon_children', function (Blueprint $table) {
            $table->dropForeign('taxon_children_ibfk_1');
        });

        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->dropForeign('role_has_permissions_role_id_foreign');
            $table->dropForeign('role_has_permissions_permission_id_foreign');
        });

        Schema::table('property_values', function (Blueprint $table) {
            $table->dropForeign('property_values_ibfk_1');
        });

        Schema::table('property_value_variation', function (Blueprint $table) {
            $table->dropForeign('property_value_variation_ibfk_2');
            $table->dropForeign('property_value_variation_ibfk_1');
            $table->dropForeign('property_value_variation_ibfk_3');
        });

        Schema::table('promocode_user', function (Blueprint $table) {
            $table->dropForeign('promocode_user_user_id_foreign');
            $table->dropForeign('promocode_user_promocode_id_foreign');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_ibfk_3');
            $table->dropForeign('products_ibfk_1');
        });

        Schema::table('product_property_value', function (Blueprint $table) {
            $table->dropForeign('product_property_value_ibfk_2');
            $table->dropForeign('product_property_value_ibfk_1');
        });

        Schema::table('product_property', function (Blueprint $table) {
            $table->dropForeign('product_property_ibfk_2');
            $table->dropForeign('product_property_ibfk_1');
        });

        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->dropForeign('model_has_roles_role_id_foreign');
        });

        Schema::table('model_has_permissions', function (Blueprint $table) {
            $table->dropForeign('model_has_permissions_permission_id_foreign');
        });

        Schema::table('humans', function (Blueprint $table) {
            $table->dropForeign('humans_ibfk_1');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_ibfk_2');
            $table->dropForeign('employees_ibfk_1');
            $table->dropForeign('employees_ibfk_3');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign('customers_ibfk_1');
        });

        Schema::dropIfExists('works');

        Schema::dropIfExists('variations');

        Schema::dropIfExists('users');

        Schema::dropIfExists('taxons');

        Schema::dropIfExists('taxonomies');

        Schema::dropIfExists('taxon_children');

        Schema::dropIfExists('states');

        Schema::dropIfExists('roles');

        Schema::dropIfExists('role_has_permissions');

        Schema::dropIfExists('property_values');

        Schema::dropIfExists('property_value_variation');

        Schema::dropIfExists('properties');

        Schema::dropIfExists('promocodes');

        Schema::dropIfExists('promocode_user');

        Schema::dropIfExists('products');

        Schema::dropIfExists('product_property_value');

        Schema::dropIfExists('product_property');

        Schema::dropIfExists('permissions');

        Schema::dropIfExists('password_resets');

        Schema::dropIfExists('packings');

        Schema::dropIfExists('notifications');

        Schema::dropIfExists('model_has_roles');

        Schema::dropIfExists('model_has_permissions');

        Schema::dropIfExists('media');

        Schema::dropIfExists('logins');

        Schema::dropIfExists('humans');

        Schema::dropIfExists('genders');

        Schema::dropIfExists('failed_jobs');

        Schema::dropIfExists('employees');

        Schema::dropIfExists('discounts');

        Schema::dropIfExists('devices');

        Schema::dropIfExists('customers');

        Schema::dropIfExists('brands');

        Schema::dropIfExists('activity_log');
    }
}
