<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
	public function up()
	{
//		Schema::table('bee_doc', function (Blueprint $table) {
//			$table->string('id',36)->primary()->change();
//		});
//		Schema::dropIfExists('files');

		Schema::create('files', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->text('description');
			$table->string('name');
			$table->longText('path');
			$table->char('bee_conta_id', 56)->nullable();
//			$table->foreign('bee_conta_id')->references('id')->on('bee_contas');
			$table->char('bee_doc_id', 36)->nullable();
//			$table->foreign('bee_doc_id')->references('id')->on('bee_doc');
			$table->char('created_by', 56)->nullable();
			$table->foreign('created_by')->references('id')->on('users');
			$table->string('extension');
			$table->string('type');
			$table->bigInteger('size');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('files');
	}
}
