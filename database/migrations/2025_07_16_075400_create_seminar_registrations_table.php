        <?php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;

        return new class extends Migration
        {
            /**
             * Run the migrations.
             */
            public function up(): void
            {
                Schema::create('seminar_registrations', function (Blueprint $table) {
                    $table->id();
                    $table->string('name'); // Nama Lengkap Peserta
                    $table->string('nim')->nullable(); // Nomor Induk Mahasiswa (opsional)
                    $table->string('email')->unique(); // Email Peserta (harus unik untuk setiap pendaftar)
                    $table->string('phone')->nullable(); // Nomor Telepon/WhatsApp
                    $table->string('faculty')->nullable(); // Fakultas
                    $table->string('major')->nullable(); // Jurusan
                    $table->timestamps(); // created_at dan updated_at
                });
            }

            /**
             * Reverse the migrations.
             */
            public function down(): void
            {
                Schema::dropIfExists('seminar_registrations');
            }
        };
