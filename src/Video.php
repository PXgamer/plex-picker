<?php

namespace pxgamer\PlexPicker;

use Carbon\Carbon;

/**
 * Class Video
 */
class Video
{
    /**
     * @var int
     */
    private $ratingKey;
    /**
     * @var string
     */
    private $key;
    /**
     * @var string
     */
    private $studio;
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $contentRating;
    /**
     * @var string
     */
    private $summary;
    /**
     * @var float
     */
    private $rating;
    /**
     * @var float
     */
    private $audienceRating;
    /**
     * @var int
     */
    private $year;
    /**
     * @var string
     */
    private $tagline;
    /**
     * @var string
     */
    private $thumb;
    /**
     * @var string
     */
    private $art;
    /**
     * @var int
     */
    private $duration;
    /**
     * @var Carbon
     */
    private $originallyAvailableAt;
    /**
     * @var Carbon
     */
    private $addedAt;
    /**
     * @var Carbon
     */
    private $updatedAt;
    /**
     * @var string
     */
    private $audienceRatingImage;
    /**
     * @var string
     */
    private $chapterSource;
    /**
     * @var string
     */
    private $primaryExtraKey;
    /**
     * @var string
     */
    private $ratingImage;

    public function __construct(array $properties = [])
    {
        foreach ($properties as $key => $item) {
            if (property_exists(self::class, $key)) {
                $this->{'set'.ucfirst($key)}($item);
            }
        }
    }

    public static function make(array $properties = [])
    {
        return new self($properties);
    }

    /**
     * @return int
     */
    public function getRatingKey(): int
    {
        return (int)$this->ratingKey;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getStudio(): string
    {
        return $this->studio;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContentRating(): string
    {
        return $this->contentRating;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @return float
     */
    public function getRating(): float
    {
        return (float)$this->rating;
    }

    /**
     * @return float
     */
    public function getAudienceRating(): float
    {
        return (float)$this->audienceRating;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return (int)$this->year;
    }

    /**
     * @return string
     */
    public function getTagline(): string
    {
        return $this->tagline;
    }

    /**
     * @return string
     */
    public function getThumb(): string
    {
        return $this->thumb;
    }

    /**
     * @return string
     */
    public function getArt(): string
    {
        return $this->art;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return (int)$this->duration;
    }

    /**
     * @return Carbon
     */
    public function getOriginallyAvailableAt(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d', $this->originallyAvailableAt);
    }

    /**
     * @return Carbon
     */
    public function getAddedAt(): Carbon
    {
        return Carbon::createFromTimestamp($this->addedAt);
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return Carbon::createFromTimestamp($this->updatedAt);
    }

    /**
     * @return string
     */
    public function getAudienceRatingImage(): string
    {
        return $this->audienceRatingImage;
    }

    /**
     * @return string
     */
    public function getChapterSource(): string
    {
        return $this->chapterSource;
    }

    /**
     * @return string
     */
    public function getPrimaryExtraKey(): string
    {
        return $this->primaryExtraKey;
    }

    /**
     * @return string
     */
    public function getRatingImage(): string
    {
        return $this->ratingImage;
    }

    /**
     * @param int $ratingKey
     */
    public function setRatingKey(int $ratingKey): void
    {
        $this->ratingKey = $ratingKey;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @param string $studio
     */
    public function setStudio(string $studio): void
    {
        $this->studio = $studio;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $contentRating
     */
    public function setContentRating(string $contentRating): void
    {
        $this->contentRating = $contentRating;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @param float $rating
     */
    public function setRating(float $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @param float $audienceRating
     */
    public function setAudienceRating(float $audienceRating): void
    {
        $this->audienceRating = $audienceRating;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @param string $tagline
     */
    public function setTagline(string $tagline): void
    {
        $this->tagline = $tagline;
    }

    /**
     * @param string $thumb
     */
    public function setThumb(string $thumb): void
    {
        $this->thumb = $thumb;
    }

    /**
     * @param string $art
     */
    public function setArt(string $art): void
    {
        $this->art = $art;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @param string $originallyAvailableAt
     */
    public function setOriginallyAvailableAt(string $originallyAvailableAt): void
    {
        $this->originallyAvailableAt = Carbon::createFromFormat('Y-m-d', $originallyAvailableAt);
    }

    /**
     * @param string $addedAt
     */
    public function setAddedAt(string $addedAt): void
    {
        $this->addedAt = Carbon::createFromTimestamp($addedAt);
    }

    /**
     * @param int $updatedAt
     */
    public function setUpdatedAt(int $updatedAt): void
    {
        $this->updatedAt = Carbon::createFromTimestamp($updatedAt);
    }

    /**
     * @param string $audienceRatingImage
     */
    public function setAudienceRatingImage(string $audienceRatingImage): void
    {
        $this->audienceRatingImage = $audienceRatingImage;
    }

    /**
     * @param string $chapterSource
     */
    public function setChapterSource(string $chapterSource): void
    {
        $this->chapterSource = $chapterSource;
    }

    /**
     * @param string $primaryExtraKey
     */
    public function setPrimaryExtraKey(string $primaryExtraKey): void
    {
        $this->primaryExtraKey = $primaryExtraKey;
    }

    /**
     * @param string $ratingImage
     */
    public function setRatingImage(string $ratingImage): void
    {
        $this->ratingImage = $ratingImage;
    }
}
