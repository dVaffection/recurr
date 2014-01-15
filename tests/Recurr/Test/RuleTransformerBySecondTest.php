<?php

namespace Recurr\Test;

use Recurr\Rule;

class RuleTransformerBySecondTest extends RuleTransformerBase
{
    public function testBySecondSecondly()
    {
        $rule = new Rule(
            'FREQ=SECONDLY;COUNT=5;BYSECOND=36,45',
            new \DateTime('2013-06-12 16:00:00')
        );

        $this->transformer->setRule($rule);
        $computed = $this->transformer->getComputedArray();

        $this->assertEquals(5, count($computed));
        $this->assertEquals(new \DateTime('2013-06-12 16:00:36'), $computed[0]);
        $this->assertEquals(new \DateTime('2013-06-12 16:00:45'), $computed[1]);
        $this->assertEquals(new \DateTime('2013-06-12 16:01:36'), $computed[2]);
        $this->assertEquals(new \DateTime('2013-06-12 16:01:45'), $computed[3]);
        $this->assertEquals(new \DateTime('2013-06-12 16:02:36'), $computed[4]);
    }

    public function testBySecondMinutely()
    {
        $rule = new Rule(
            'FREQ=MINUTELY;COUNT=5;BYSECOND=36,45',
            new \DateTime('2013-06-12 16:00:00')
        );

        $this->transformer->setRule($rule);
        $computed = $this->transformer->getComputedArray();

        $this->assertEquals(5, count($computed));
        $this->assertEquals(new \DateTime('2013-06-12 16:00:36'), $computed[0]);
        $this->assertEquals(new \DateTime('2013-06-12 16:00:45'), $computed[1]);
        $this->assertEquals(new \DateTime('2013-06-12 16:01:36'), $computed[2]);
        $this->assertEquals(new \DateTime('2013-06-12 16:01:45'), $computed[3]);
        $this->assertEquals(new \DateTime('2013-06-12 16:02:36'), $computed[4]);
    }

    public function testBySecondHourly()
    {
        $rule = new Rule(
            'FREQ=HOURLY;COUNT=5;BYSECOND=36,45',
            new \DateTime('2013-06-12 16:00:00')
        );

        $this->transformer->setRule($rule);
        $computed = $this->transformer->getComputedArray();

        $this->assertEquals(5, count($computed));
        $this->assertEquals(new \DateTime('2013-06-12 16:00:36'), $computed[0]);
        $this->assertEquals(new \DateTime('2013-06-12 16:00:45'), $computed[1]);
        $this->assertEquals(new \DateTime('2013-06-12 17:00:36'), $computed[2]);
        $this->assertEquals(new \DateTime('2013-06-12 17:00:45'), $computed[3]);
        $this->assertEquals(new \DateTime('2013-06-12 18:00:36'), $computed[4]);
    }

    public function testBySecondDaily()
    {
        $rule = new Rule(
            'FREQ=DAILY;COUNT=5;BYSECOND=36,45',
            new \DateTime('2013-06-12 16:00:00')
        );

        $this->transformer->setRule($rule);
        $computed = $this->transformer->getComputedArray();

        $this->assertEquals(5, count($computed));
        $this->assertEquals(new \DateTime('2013-06-12 16:00:36'), $computed[0]);
        $this->assertEquals(new \DateTime('2013-06-12 16:00:45'), $computed[1]);
        $this->assertEquals(new \DateTime('2013-06-13 16:00:36'), $computed[2]);
        $this->assertEquals(new \DateTime('2013-06-13 16:00:45'), $computed[3]);
        $this->assertEquals(new \DateTime('2013-06-14 16:00:36'), $computed[4]);
    }

    public function testBySecondWeekly()
    {
        $rule = new Rule(
            'FREQ=WEEKLY;COUNT=5;BYSECOND=36,45',
            new \DateTime('2013-06-12 16:00:00')
        );

        $this->transformer->setRule($rule);
        $computed = $this->transformer->getComputedArray();

        $this->assertEquals(5, count($computed));
        $this->assertEquals(new \DateTime('2013-06-12 16:00:36'), $computed[0]);
        $this->assertEquals(new \DateTime('2013-06-12 16:00:45'), $computed[1]);
        $this->assertEquals(new \DateTime('2013-06-19 16:00:36'), $computed[2]);
        $this->assertEquals(new \DateTime('2013-06-19 16:00:45'), $computed[3]);
        $this->assertEquals(new \DateTime('2013-06-26 16:00:36'), $computed[4]);
    }

    public function testBySecondMonthly()
    {
        $rule = new Rule(
            'FREQ=MONTHLY;COUNT=5;BYSECOND=36,45',
            new \DateTime('2013-06-12 16:00:00')
        );

        $this->transformer->setRule($rule);
        $computed = $this->transformer->getComputedArray();

        $this->assertEquals(5, count($computed));
        $this->assertEquals(new \DateTime('2013-06-12 16:00:36'), $computed[0]);
        $this->assertEquals(new \DateTime('2013-06-12 16:00:45'), $computed[1]);
        $this->assertEquals(new \DateTime('2013-07-12 16:00:36'), $computed[2]);
        $this->assertEquals(new \DateTime('2013-07-12 16:00:45'), $computed[3]);
        $this->assertEquals(new \DateTime('2013-08-12 16:00:36'), $computed[4]);
    }

    public function testBySecondYearly()
    {
        $rule = new Rule(
            'FREQ=YEARLY;COUNT=5;BYSECOND=36,45',
            new \DateTime('2013-06-12 16:00:00')
        );

        $this->transformer->setRule($rule);
        $computed = $this->transformer->getComputedArray();

        $this->assertEquals(5, count($computed));
        $this->assertEquals(new \DateTime('2013-06-12 16:00:36'), $computed[0]);
        $this->assertEquals(new \DateTime('2013-06-12 16:00:45'), $computed[1]);
        $this->assertEquals(new \DateTime('2014-06-12 16:00:36'), $computed[2]);
        $this->assertEquals(new \DateTime('2014-06-12 16:00:45'), $computed[3]);
        $this->assertEquals(new \DateTime('2015-06-12 16:00:36'), $computed[4]);
    }
}