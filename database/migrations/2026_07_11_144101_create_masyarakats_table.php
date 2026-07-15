public function up(): void
{
    Schema::create('masyarakats', function (Blueprint $table) {

        $table->id();

        $table->string('nik')->unique();

        $table->string('nama');

        $table->enum('jenis_kelamin', [
            'Laki-laki',
            'Perempuan'
        ]);

        $table->text('alamat');

        $table->string('no_hp');

        $table->string('email')->nullable();

        $table->timestamps();

    });
}