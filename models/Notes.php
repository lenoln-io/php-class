<?php

class Notes
{
    private int $id;
    private string $body_note;
    private int $user_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getBodyNote(): string
    {
        return $this->body_note;
    }

    public function setBodyNote(string $body_note): void
    {
        $this->body_note = $body_note;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }


}