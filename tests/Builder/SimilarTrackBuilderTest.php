<?php

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\LastFm\Tests\Builder;

use Core23\LastFm\Builder\SimilarTrackBuilder;
use PHPUnit\Framework\TestCase;

class SimilarTrackBuilderTest extends TestCase
{
    public function testForMbid(): void
    {
        $builder = SimilarTrackBuilder::forMbid('a466c2a2-6517-42fb-a160-1087c3bafd9f');

        $expected = [
            'mbid' => 'a466c2a2-6517-42fb-a160-1087c3bafd9f',
        ];
        $this->assertSame($expected, $builder->getQuery());
    }

    public function testForTrack(): void
    {
        $builder = SimilarTrackBuilder::forTrack('Slipknot', 'Before I Forget');

        $expected = [
            'artist' => 'Slipknot',
            'track'  => 'Before I Forget',
        ];
        $this->assertSame($expected, $builder->getQuery());
    }

    public function testAutocorrect(): void
    {
        $builder = SimilarTrackBuilder::forMbid('a466c2a2-6517-42fb-a160-1087c3bafd9f')
            ->autocorrect(true)
        ;

        $expected = [
            'mbid'        => 'a466c2a2-6517-42fb-a160-1087c3bafd9f',
            'autocorrect' => 1,
        ];
        $this->assertSame($expected, $builder->getQuery());
    }

    public function testNoAutocorrect(): void
    {
        $builder = SimilarTrackBuilder::forMbid('a466c2a2-6517-42fb-a160-1087c3bafd9f')
            ->autocorrect(false)
        ;

        $expected = [
            'mbid'        => 'a466c2a2-6517-42fb-a160-1087c3bafd9f',
            'autocorrect' => 0,
        ];
        $this->assertSame($expected, $builder->getQuery());
    }

    public function testLimit(): void
    {
        $builder = SimilarTrackBuilder::forMbid('a466c2a2-6517-42fb-a160-1087c3bafd9f')
            ->limit(13)
        ;

        $expected = [
            'mbid'     => 'a466c2a2-6517-42fb-a160-1087c3bafd9f',
            'limit'    => 13,
        ];
        $this->assertSame($expected, $builder->getQuery());
    }
}