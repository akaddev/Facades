<?php
declare(strict_types=1);

namespace CosmonovaRnD\Facades\Buildings\DTO;

/**
 * Class Agreement
 *
 * @author Serhii Kondratiuk <serhii.kondratiuk@cosmonova.net>
 * @package CosmonovaRnD\Facades\Buildings
 * @since   1.3.0
 * Cosmonova | Research & Development
 */
class Agreement
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var array|null
     */
    public $files;
    /**
     * @var \DateTimeImmutable
     */
    public $signDate;
    /**
     * @var \DateTimeImmutable
     */
    public $expires;
    /**
     * @var bool
     */
    public $autoExtend;
    /**
     * @var string
     */
    public $createdBy;
    /**
     * @var \DateTimeImmutable
     */
    public $createdAt;
    /**
     * @var string
     */
    public $editedBy;
    /**
     * @var \DateTimeImmutable
     */
    public $updatedAt;

    /**
     * Agreement constructor.
     * @param int $id
     * @param array|null $files
     * @param \DateTimeImmutable $signDate
     * @param \DateTimeImmutable $expires
     * @param bool $autoExtend
     * @param string $createdBy
     * @param \DateTimeImmutable $createdAt
     * @param string $editedBy
     * @param \DateTimeImmutable $updatedAt
     */
    public function __construct(
        int $id,
        ?array $files,
        \DateTimeImmutable $signDate,
        \DateTimeImmutable $expires,
        bool $autoExtend,
        string $createdBy,
        \DateTimeImmutable $createdAt,
        string $editedBy,
        \DateTimeImmutable $updatedAt
    ) {
        $this->id = $id;
        $this->files = $files;
        $this->signDate = $signDate;
        $this->expires = $expires;
        $this->autoExtend = $autoExtend;
        $this->createdBy = $createdBy;
        $this->createdAt = $createdAt;
        $this->editedBy = $editedBy;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @param array $data
     * @return Agreement
     */
    public static function createFromResponse(array $data): self
    {
        return new self(
            (int)$data['id'],
            $data['files'],
            new \DateTimeImmutable($data['sign_date']),
            new \DateTimeImmutable($data['expires']),
            $data['auto_extend'],
            $data['created_by'],
            new \DateTimeImmutable($data['created_at']),
            $data['edited_by'],
            new \DateTimeImmutable($data['updated_at'])
        );
    }
}