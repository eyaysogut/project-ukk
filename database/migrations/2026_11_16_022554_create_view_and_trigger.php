<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE OR REPLACE VIEW view_portofolio_publish AS
            SELECT id, nama_usaha, slug, bio, foto, no_wa, produk_unggulan, created_at
            FROM portofolios
            WHERE status = 'publish'
        ");

        DB::unprepared("
            CREATE TRIGGER trg_portofolio_after_insert
            AFTER INSERT ON portofolios
            FOR EACH ROW
            BEGIN
                INSERT INTO log_activities (aksi, portfolio_id, nama_usaha, keterangan, created_at)
                VALUES ('INSERT', NEW.id, NEW.nama_usaha,
                        CONCAT('Portofolio baru ditambahkan: ', NEW.nama_usaha), NOW());
            END
        ");

        DB::unprepared("
            CREATE TRIGGER trg_portofolio_after_update
            AFTER UPDATE ON portofolios
            FOR EACH ROW
            BEGIN
                IF OLD.status <> NEW.status THEN
                    INSERT INTO log_activities (aksi, portfolio_id, nama_usaha, keterangan, created_at)
                    VALUES ('UPDATE', NEW.id, NEW.nama_usaha,
                            CONCAT('Status diubah dari ', OLD.status, ' menjadi ', NEW.status), NOW());
                ELSE
                    INSERT INTO log_activities (aksi, portfolio_id, nama_usaha, keterangan, created_at)
                    VALUES ('UPDATE', NEW.id, NEW.nama_usaha,
                            CONCAT('Data portofolio diubah: ', NEW.nama_usaha), NOW());
                END IF;
            END
        ");

        DB::unprepared("
            CREATE TRIGGER trg_portofolio_after_delete
            AFTER DELETE ON portofolios
            FOR EACH ROW
            BEGIN
                INSERT INTO log_activities (aksi, portfolio_id, nama_usaha, keterangan, created_at)
                VALUES ('DELETE', OLD.id, OLD.nama_usaha,
                        CONCAT('Portofolio dihapus: ', OLD.nama_usaha), NOW());
            END
        ");
    }

    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS trg_portofolio_after_insert");
        DB::unprepared("DROP TRIGGER IF EXISTS trg_portofolio_after_update");
        DB::unprepared("DROP TRIGGER IF EXISTS trg_portofolio_after_delete");
        DB::statement("DROP VIEW IF EXISTS view_portofolio_publish");
    }
};