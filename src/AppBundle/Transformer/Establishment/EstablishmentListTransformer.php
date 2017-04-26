<?php
namespace AppBundle\Transformer\Establishment;

use AppBundle\Entity\Establishment\EstablishmentListInterface;
use AppBundle\Utils\IntegerTrait;

class EstablishmentListTransformer implements EstablishmentListTransformerInterface
{
    use IntegerTrait;

    /**
     * @var array
     */
    private $counts = [];

    /**
     * @var int
     */
    private $total = 0;

    /**
     * {@inheritdoc}
     */
    public function transform(EstablishmentListInterface $list) : array
    {
        foreach ($list as $establishment) {
            if ($establishment->getRatingValue()) {
                $this->incrementCount($establishment->getRatingValue());
            }
        }

        return $this->generateSummary();
    }

    /**
     * @param string $ratingValue
     */
    private function incrementCount(string $ratingValue): void
    {
        if (!isset($this->counts[$ratingValue])) {
            $this->counts[$ratingValue] = 0;
        }

        $this->total++;
        $this->counts[$ratingValue]++;
    }

    /**
     * @return array
     */
    private function generateSummary(): array
    {
        $summaryList = [];

        foreach($this->counts as $label => $count) {
            $summaryList[] = [
                'rating' => $this->generateLabel($label),
                'percentage' => round( ($count / $this->total) * 100, 1)
            ];
        }

        return $summaryList;
    }

    /**
     * @param string $label
     * @return string
     */
    private function generateLabel(string $label): string
    {
        if ($this->isInteger($label)) {
            return $label . '-star';
        } else {
            return $label;
        }
    }
}
