<?php

namespace Database\Seeders\Default;

use App\Models\Stitch;
use App\Support\Enums\ProjectTypes;
use Illuminate\Database\Seeder;

class StitchSeeder extends Seeder
{
    public function run(): void
    {
        $stitches = array_merge($this->crochetStitches(), $this->knitStitches());
        foreach ($stitches as $stitch) {
            $stitchExists = Stitch::where('name_us', '=', $stitch['name_us'])
                ->where('name_uk', '=', $stitch['name_uk'])
                ->exists();

            if($stitchExists) {
                continue;
            }

            Stitch::create($stitch);
        }
    }

    private function crochetStitches(): array
    {
        return [
            [
                'type' => ProjectTypes::CROCHET,
                'name_us' => 'Chain',
                'name_uk' => 'Chain',
                'abbreviation_us' => 'ch',
                'abbreviation_uk' => 'ch',
                'steps' => [
                    'YO',
                    'Pull through',
                ],
            ],
            [
                'type' => ProjectTypes::CROCHET,
                'name_us' => 'Single Crochet',
                'name_uk' => 'Double Crochet',
                'abbreviation_us' => 'sc',
                'abbreviation_uk' => 'dc',
                'steps' => [
                    'Insert hook into stitch',
                    'YO and pull up a loop (2 loops on hook)',
                    'YO and pull through both loops on hook',
                ],
            ],
            [
                'type' => ProjectTypes::CROCHET,
                'name_us' => 'Half Double Crochet',
                'name_uk' => 'Half Treble Crochet',
                'abbreviation_us' => 'hdc',
                'abbreviation_uk' => 'htr',
                'steps' => [
                    'YO',
                    'Insert hook into stitch',
                    'YO and pull up a loop (3 loops on hook)',
                    'YO and pull through all three loops on hook',
                ],
            ],
            [
                'type' => ProjectTypes::CROCHET,
                'name_us' => 'Double Crochet',
                'name_uk' => 'Treble Crochet',
                'abbreviation_us' => 'dc',
                'abbreviation_uk' => 'tr',
                'steps' => [
                    'YO',
                    'Insert hook into stitch',
                    'YO and pull up a loop (3 loops on hook)',
                    'YO and pull through the first two loops (2 loops on hook)',
                    'YO and pull through the remaining two loops',
                ],
            ],
            [
                'type' => ProjectTypes::CROCHET,
                'name_us' => 'Triple Crochet',
                'name_uk' => 'Double Treble',
                'abbreviation_us' => 'tr',
                'abbreviation_uk' => 'dtr',
                'steps' => [
                    'YO twice',
                    'Insert hook into stitch',
                    'YO and pull up a loop (4 loops on hook)',
                    'YO and pull through the first two loops (3 loops on hook)',
                    'YO and pull through the next two loops (2 loops on hook)',
                    'YO and pull through the remaining two loops',
                ],
            ],
            [
                'type' => ProjectTypes::CROCHET,
                'name_us' => 'Slip Stitch',
                'name_uk' => 'Slip Stitch',
                'abbreviation_us' => 'Sl st',
                'abbreviation_uk' => 'Sl st',
                'steps' => [
                    'Insert hook into stitch',
                    'YO and pull through both the stitch and the loop on the hook',
                ],
            ],
            [
                'type' => ProjectTypes::CROCHET,
                'name_us' => 'Front Post Double Crochet',
                'name_uk' => 'Raised Treble Front',
                'abbreviation_us' => 'FPdc',
                'abbreviation_uk' => 'RtrF',
                'steps' => [
                    'YO',
                    'Insert hook from front to back and around the post of the stitch below',
                    'YO and pull up a loop (3 loops on hook)',
                    'YO and pull through the first two loops (2 loops on hook)',
                    'YO and pull through the remaining two loops',
                ],
            ],
            [
                'type' => ProjectTypes::CROCHET,
                'name_us' => 'Back Post Double Crochet',
                'name_uk' => 'Raised Treble Back',
                'abbreviation_us' => 'BPdc',
                'abbreviation_uk' => 'RtrB',
                'steps' => [
                    'YO',
                    'Insert hook from back to front and around the post of the stitch below',
                    'YO and pull up a loop (3 loops on hook)',
                    'YO and pull through the first two loops (2 loops on hook)',
                    'YO and pull through the remaining two loops',
                ],
            ],
        ];
    }


    private function knitStitches(): array {
        return [
            [
                'type' => ProjectTypes::KNIT,
                'name_us' => 'Knit',
                'name_uk' => 'Knit',
                'abbreviation_us' => 'K',
                'abbreviation_uk' => 'K',
                'steps' => [
                    'Insert needle knitwise',
                    'Wrap yarn counterclockwise',
                    'Pull loop through',
                    'Slip stitch off needle',
                ],
            ],
            [
                'type' => ProjectTypes::KNIT,
                'name_us' => 'Purl',
                'name_uk' => 'Purl',
                'abbreviation_us' => 'P',
                'abbreviation_uk' => 'P',
                'steps' => [
                    'Insert needle purlwise',
                    'Wrap yarn counterclockwise',
                    'Pull loop through',
                    'Slip stitch off needle',
                ],
            ],
            [
                'type' => ProjectTypes::KNIT,
                'name_us' => 'Knit Two Together',
                'name_uk' => 'Knit Two Together',
                'abbreviation_us' => 'K2Tog',
                'abbreviation_uk' => 'K2Tog',
                'steps' => [
                    'Insert needle knitwise into two stitches',
                    'Wrap yarn counterclockwise',
                    'Pull loop through both stitches',
                    'Slip both stitches off needle',
                ],
            ],
            [
                'type' => ProjectTypes::KNIT,
                'name_us' => 'Purl Two Together',
                'name_uk' => 'Purl Two Together',
                'abbreviation_us' => 'P2Tog',
                'abbreviation_uk' => 'P2Tog',
                'steps' => [
                    'Insert needle purlwise into two stitches',
                    'Wrap yarn counterclockwise',
                    'Pull loop through both stitches',
                    'Slip both stitches off needle',
                ],
            ],
            [
                'type' => ProjectTypes::KNIT,
                'name_us' => 'Slip Stitch',
                'name_uk' => 'Slip Stitch',
                'abbreviation_us' => 'Sl',
                'abbreviation_uk' => 'Sl',
                'steps' => [
                    'Insert needle into stitch as directed (knitwise or purlwise)',
                    'Transfer stitch to the other needle without working it',
                ],
            ],
            [
                'type' => ProjectTypes::KNIT,
                'name_us' => 'Yarn Over',
                'name_uk' => 'Yarn Over',
                'abbreviation_us' => 'YO',
                'abbreviation_uk' => 'YO',
                'steps' => [
                    'Bring yarn over the needle',
                    'Prepare to work the next stitch',
                ],
            ],
            [
                'type' => ProjectTypes::KNIT,
                'name_us' => 'Make One (Left)',
                'name_uk' => 'Make One (Left)',
                'abbreviation_us' => 'M1L',
                'abbreviation_uk' => 'M1L',
                'steps' => [
                    'Lift the bar between stitches from front to back',
                    'Knit into the back of the lifted loop',
                ],
            ],
            [
                'type' => ProjectTypes::KNIT,
                'name_us' => 'Make One (Right)',
                'name_uk' => 'Make One (Right)',
                'abbreviation_us' => 'M1R',
                'abbreviation_uk' => 'M1R',
                'steps' => [
                    'Lift the bar between stitches from back to front',
                    'Knit into the front of the lifted loop',
                ],
            ],
        ];
    }

}
