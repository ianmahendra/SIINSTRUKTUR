<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_karyawan', function (Blueprint $table) {
            $table->id('karyawan_id');
            $table->string('karyawan_pk')->nullable(true);
            $table->string('nid')->nullable(true);
            $table->string('nama_lengkap')->nullable(true);
            $table->string('lokasi_unit')->nullable(true);
            $table->string('direktorat')->nullable(true);
            $table->string('divisi_asal')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('telpon')->nullable(true);
            $table->string('posisi')->nullable(true);
            $table->string('tgl_jabatan')->nullable(true);
            $table->string('tgl_lahir')->nullable(true);
            $table->string('agama')->nullable(true);
            $table->string('alamat_ktp')->nullable(true);
            $table->string('kota_ktp')->nullable(true);
            $table->string('provinsi_ktp')->nullable(true);
            $table->string('kode_pos_ktp')->nullable(true);
            $table->string('alamat_domisili')->nullable(true);
            $table->string('kota_domisili')->nullable(true);
            $table->string('provinsi_domisili')->nullable(true);
            $table->string('kode_pos_domisili')->nullable(true);
            $table->string('jenjang_jabatan')->nullable(true);
            $table->string('ktp')->nullable(true);
            $table->string('npwp')->nullable(true);
            $table->string('jenis_kelamin')->nullable(true);
            $table->string('status_kawin')->nullable(true);
            $table->string('asal_pegawai')->nullable(true);
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
        //
        Schema::dropIfExists('master_karyawan');
    }
}
