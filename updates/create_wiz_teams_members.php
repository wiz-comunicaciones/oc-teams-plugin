<?php namespace Wiz\Teams\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateWizTeamsMembers extends Migration
{
    public function up()
    {
        Schema::create('wiz_teams_members', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('job')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->text('facebook_url')->nullable();
            $table->string('instagram_user')->nullable();
            $table->string('twitter_user')->nullable();
            $table->boolean('is_published')->nullable()->default(0);
            $table->integer('parent_id')->nullable()->unsigned();
            $table->integer('nest_left')->nullable()->unsigned();
            $table->integer('nest_right')->nullable()->unsigned();
            $table->integer('nest_depth')->nullable()->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('wiz_teams_members');
    }
}