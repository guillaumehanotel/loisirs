<?php

namespace App\DataTransferObjects\Book;

use Google\Service\Books\Volume;

class BookDto
{
    public string $id;
    public string $title;
    public array $authors;
    public string $description;
    public string $publishedDate;
    public ?string $publisher;
    public ?array $categories;
    public string $language;
    public ?int $pageCount;
    public ?string $thumbnail;
    public string $previewLink;
    public string $infoLink;
    public bool $isEbook;
    public ?string $price;

    public function __construct(Volume $volume)
    {
        $this->id = $volume->getId();
        $volumeInfo = $volume->getVolumeInfo();
        $this->title = $volumeInfo->getTitle();
        $this->authors = $volumeInfo->getAuthors();
        $this->description = $volumeInfo->getDescription();
        $this->publishedDate = $volumeInfo->getPublishedDate();
        $this->publisher = $volumeInfo->getPublisher();
        $this->categories = $volumeInfo->getCategories();
        $this->language = $volumeInfo->getLanguage();
        $this->pageCount = $volumeInfo->getPageCount();
        $this->thumbnail = $volumeInfo->getImageLinks()?->getThumbnail();
        $this->previewLink = $volumeInfo->getPreviewLink();
        $this->infoLink = $volumeInfo->getInfoLink();
        $this->isEbook = $volume->getSaleInfo()->getIsEbook();
        $this->price = $volume->getSaleInfo()->getRetailPrice()?->getAmount();
    }
}
