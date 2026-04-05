<?php

class Auth
{
    private PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
                DB_USER,
                DB_PW,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
        } catch (PDOException $e) {
            die("Datenbankverbindung fehlgeschlagen");
        }
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public function login(string $user, string $password): bool
    {
        if ($user === '' || $password === '') {
            return false;
        }

        $stmt = $this->pdo->prepare(
            "SELECT passwort FROM name WHERE name = :name"
        );
        $stmt->execute(['name' => $user]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return false;
        }

        return password_verify($password, $row['passwort']);
    }

    public function registriren(string $user, string $password): bool
    {
        if ($user === '' || $password === '') {
            return false;
        }

        // Prüfen ob User existiert
        $stmt = $this->pdo->prepare(
            "SELECT nameid FROM name WHERE name = :name"
        );
        $stmt->execute(['name' => $user]);    //ist dieser teil unnötig?

        if ($stmt->fetch()) {
            return false;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare(
            "INSERT INTO name (name, passwort, points)
             VALUES (:name, :passwort, 0)"
        );

        return $stmt->execute([
            'name' => $user,
            'passwort' => $hash
        ]);
    }
}

