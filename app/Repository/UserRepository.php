<?php

namespace Proyek1\Repository;

use Proyek1\Domain\AkumulasiLaporan;
use Proyek1\Domain\MyToken;
use Proyek1\Domain\Rekap;
use Proyek1\Domain\User;
use Proyek1\Domain\Laporan;

class UserRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(User $user): User
    {
        $statement = $this->connection->prepare("INSERT INTO users(id, name, password) VALUES (?, ?, ?)");
        $statement->execute([
            $user->id, $user->name, $user->password
        ]);
        return $user;
    }

    public function update(User $user): User
    {
        $statement = $this->connection->prepare("UPDATE users SET name = ?, password = ? WHERE id = ?");
        $statement->execute([
            $user->name, $user->password, $user->id
        ]);
        return $user;
    }

    public function findById(string $id): ?User
    {
        $statement = $this->connection->prepare("SELECT id, name, password FROM users WHERE id = ?");
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                $user = new User();
                $user->id = $row['id'];
                $user->name = $row['name'];
                $user->password = $row['password'];
                return $user;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteAll(): void
    {
        $this->connection->exec("DELETE from users");
    }
    
    public function setTheToken($id): ?MyToken{
        $email = $id->id;

        $token = bin2hex(random_bytes(16));
        
        $token_hash = hash("sha256", $token);

        $expiry = date("Y-m-d H:i:s", time() + 60 * 60 );
        
        $statement = $this->connection->prepare("UPDATE users set reset_token_hash = ?, reset_token_expires_at = ? WHERE id = ?");
        $statement->execute([$token_hash, $expiry, $email]);

        try {
            if ($row = $statement->fetch()){
                $myToken = new MyToken();
                $myToken->resetTokenHash = $row['reset_token_hash'];
                $myToken->resetTokenExpiresAt = $row['reset_token_expires_at'];

                return $myToken;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }

        


    }

    public function laporan(Laporan $laporan): Laporan {
        $tanggal_waktu = date('Y-m-d H:i:s');
        $statement = $this->connection->prepare("INSERT INTO laporan(no_kk, jumlah_anggota_keluarga, jumlah_rumah, langit_langit, dinding, lantai, jendela_kamar_tidur, jendela_ruang_keluarga, ventilasi, lubang_asap_dapur, pencahayaan, sarana_air_minum, jamban, spal, tps, tanggal_waktu, nama_laporan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute([$laporan->no_kk, $laporan->jumlah_anggota_keluarga, $laporan->jumlah_rumah, $laporan->langit_langit, $laporan->dinding, $laporan->lantai, $laporan->jendela_kamar_tidur, $laporan->jendela_ruang_keluarga, $laporan->ventilasi, $laporan->lubang_asap_dapur, $laporan->pencahayaan, $laporan->sarana_air_minum, $laporan->jamban, $laporan->spal, $laporan->tps, $tanggal_waktu, $laporan->nama_laporan]);

        return $laporan;
    }

    public function rekapLaporan(): array {
        $statement = $this->connection->prepare(
            "SELECT MIN(no) AS no, nama_laporan, MAX(tanggal_waktu) AS tanggal_waktu FROM laporan GROUP BY nama_laporan;"
        );
        $statement->execute();
    
        try {
            $result = [];
            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $rekap = new Rekap();
                $rekap->no = (int) $row['no'];
                $rekap->nama_laporan = $row['nama_laporan'];
                $rekap->tanggal_waktu = $row['tanggal_waktu'];
                $result[] = $rekap;
            }
            return $result;
        } finally {
            $statement->closeCursor();
        }
    }

    public function getGroupedData(): array {
        $statement = $this->connection->prepare("SELECT * FROM laporan ORDER BY nama_laporan");
        $statement->execute();
    
        $result = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
            $result[$row['nama_laporan']][] = $row; // Kelompokkan berdasarkan nama_laporan
        }
    
        return $result;
    }

    public function akumulasiLaporan(): array {
        $statement = $this->connection->prepare(
            "SELECT no, no_kk, tanggal_waktu FROM laporan ORDER BY tanggal_waktu DESC;"
        );
        $statement->execute();
    
        try {
            $result = [];
            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $rekap = new AkumulasiLaporan();
                $rekap->no = (int) $row['no'];
                $rekap->no_kk = $row['no_kk'];
                $rekap->tanggal_waktu = $row['tanggal_waktu'];
                $result[] = $rekap;
            }
            return $result;
        } finally {
            $statement->closeCursor();
        }
    }
    


    
    
    
    
}