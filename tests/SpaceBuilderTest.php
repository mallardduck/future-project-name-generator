<?php

declare(strict_types=1);

namespace RobThree\HumanoID\Test;

use RobThree\HumanoID\HumanoID;
use RobThree\HumanoID\HumanoIDs;
use Spatie\Snapshots\MatchesSnapshots;

/**
 * This set of tests will cover only the most basic kinds of generation tests.
 *
 * @see HumanoID
 */
class SpaceBuilderTest extends BaseTestCase
{
    use MatchesSnapshots;

    public function testCanGetGeneratorFromBuilder(): void
    {
        $generator = HumanoIDs::spaceIdGenerator();
        $this->assertIsObject($generator);
        $this->assertInstanceOf(HumanoID::class, $generator);
    }

    public function testDefaultGeneratorCanGenerateFirstTwoDozen(): void
    {
        $generator = HumanoIDs::spaceIdGenerator();
        $firstTwoDozenIds = [];
        for ($i = 0; $i <= 24; $i++) {
            $firstTwoDozenIds[] = $generator->create($i);
        }

        $this->assertMatchesJsonSnapshot($firstTwoDozenIds);
    }

    public function testDefaultGeneratorCanGenerateDozenLargeIds(): void
    {
        $generator = HumanoIDs::spaceIdGenerator();
        $firstTwoDozenIds = [];
        for ($i = 0; $i <= 12; $i++) {
            $firstTwoDozenIds[] = $generator->create($i + 1024);
        }

        $this->assertMatchesJsonSnapshot($firstTwoDozenIds);
    }

    public function testDefaultGeneratorCanGenerateDozenVeryLargeIds(): void
    {
        $generator = HumanoIDs::spaceIdGenerator();
        $firstTwoDozenIds = [];
        for ($i = 0; $i <= 12; $i++) {
            $firstTwoDozenIds[] = $generator->create($i + 4194304);
        }

        $this->assertMatchesJsonSnapshot($firstTwoDozenIds);
    }
}
