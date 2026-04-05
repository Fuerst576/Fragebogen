<?php

class Quiz
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


    public function uploadAntwort(string $username, array $antworten, array $loesungen): bool
    {
        $punkte = 0;
        foreach ($loesungen as $frage => $richtig) {
            if (isset($antworten[$frage]) && $antworten[$frage] === $richtig) {
                $punkte++;
            }
        }

        $stmt = $this->pdo->prepare("SELECT nameid FROM name WHERE name = :name");
        $stmt->execute(['name' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false;
        }

        $nameid = $user['nameid'];

        $sql = "INSERT INTO points (nameid, points, f1, f2, f3, f4, f5, f6)
                VALUES (:nameid, :points, :f1, :f2, :f3, :f4, :f5, :f6)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nameid' => $nameid,
            ':points' => $punkte,
            ':f1' => $antworten['frage1'] ?? null,
            ':f2' => $antworten['frage2'] ?? null,
            ':f3' => $antworten['frage37'] ?? null,
            ':f4' => $antworten['frage4'] ?? null,
            ':f5' => $antworten['frage5'] ?? null,
            ':f6' => $antworten['frage6'] ?? null,
        ]);
    }

    public function getAntworten(string $username): array
    {
        $stmt = $this->pdo->prepare("SELECT nameid FROM name WHERE name = :name");
        $stmt->execute(['name' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return [];
        }

        $nameid = $user['nameid'];

        $stmt = $this->pdo->prepare("SELECT * FROM points WHERE nameid = :nameid ORDER BY id DESC");
        $stmt->execute(['nameid' => $nameid]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAnzahlFuerPunkte(int $punkte): int
    {
        $stmt = $this->pdo->prepare(
            "SELECT COUNT(*) 
         FROM points 
         WHERE points = :punkte"
        );

        $stmt->execute(['punkte' => $punkte]);
        return (int) $stmt->fetchColumn();
    }

}
