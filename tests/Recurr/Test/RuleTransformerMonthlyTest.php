<?php

namespace Recurr\Test;

use Recurr\Rule;
use Recurr\RuleTransformerConfig;

class RuleTransformerMonthsTest extends RuleTransformerBase
{
    public function testMonthly()
    {
        $timezone = 'America/New_York';
        $timezoneObj = new \DateTimeZone($timezone);

        $rule = new Rule(
            'FREQ=MONTHLY;COUNT=3;INTERVAL=1',
            new \DateTime('2013-01-31 00:00:00', $timezoneObj),
            $timezone
        );

        $this->transformer->setRule($rule);
        $computed = $this->transformer->getComputedArray();

        $this->assertEquals(3, count($computed));
        $this->assertEquals(new \DateTime('2013-01-31 00:00:00', $timezoneObj), $computed[0]);
        $this->assertEquals(new \DateTime('2013-03-31 00:00:00', $timezoneObj), $computed[1]);
        $this->assertEquals(new \DateTime('2013-05-31 00:00:00', $timezoneObj), $computed[2]);
    }

    public function testMonthlyWithLastDayFixEnabled()
    {
        $rule = new Rule(
            'FREQ=MONTHLY;COUNT=10',
            new \DateTime('2013-11-30')
        );

        $transformerConfig = new RuleTransformerConfig();
        $transformerConfig->enableLastDayOfMonthFix();

        $this->transformer->setRule($rule);
        $this->transformer->setConfig($transformerConfig);
        $computed = $this->transformer->getComputedArray();

        $this->assertEquals(10, count($computed));
        $this->assertEquals(new \DateTime('2013-11-30'), $computed[0]);
        $this->assertEquals(new \DateTime('2013-12-30'), $computed[1]);
        $this->assertEquals(new \DateTime('2014-01-30'), $computed[2]);
        $this->assertEquals(new \DateTime('2014-02-28'), $computed[3]);
        $this->assertEquals(new \DateTime('2014-03-30'), $computed[4]);
        $this->assertEquals(new \DateTime('2014-04-30'), $computed[5]);
        $this->assertEquals(new \DateTime('2014-05-30'), $computed[6]);
        $this->assertEquals(new \DateTime('2014-06-30'), $computed[7]);
        $this->assertEquals(new \DateTime('2014-07-30'), $computed[8]);
        $this->assertEquals(new \DateTime('2014-08-30'), $computed[9]);
    }

    public function testMonthlyWithLastDayFixEnabledOnLeapYear()
    {
        $rule = new Rule(
            'FREQ=MONTHLY;COUNT=8',
            new \DateTime('2016-01-31')
        );

        $transformerConfig = new RuleTransformerConfig();
        $transformerConfig->enableLastDayOfMonthFix();

        $this->transformer->setRule($rule);
        $this->transformer->setConfig($transformerConfig);
        $computed = $this->transformer->getComputedArray();

        $this->assertEquals(8, count($computed));
        $this->assertEquals(new \DateTime('2016-01-31'), $computed[0]);
        $this->assertEquals(new \DateTime('2016-02-29'), $computed[1]);
        $this->assertEquals(new \DateTime('2016-03-31'), $computed[2]);
        $this->assertEquals(new \DateTime('2016-04-30'), $computed[3]);
        $this->assertEquals(new \DateTime('2016-05-31'), $computed[4]);
        $this->assertEquals(new \DateTime('2016-06-30'), $computed[5]);
        $this->assertEquals(new \DateTime('2016-07-31'), $computed[6]);
        $this->assertEquals(new \DateTime('2016-08-31'), $computed[7]);
    }

    public function testLastDayOfMonth()
    {
        $rule = new Rule(
            'FREQ=MONTHLY;COUNT=5;BYMONTHDAY=28,29,30,31;BYSETPOS=-1',
            new \DateTime('2016-01-29')
        );

        $this->transformer->setRule($rule);
        $computed = $this->transformer->getComputedArray();

        $this->assertEquals(5, count($computed));
        $this->assertEquals(new \DateTime('2016-01-31'), $computed[0]);
        $this->assertEquals(new \DateTime('2016-02-29'), $computed[1]);
        $this->assertEquals(new \DateTime('2016-03-31'), $computed[2]);
        $this->assertEquals(new \DateTime('2016-04-30'), $computed[3]);
        $this->assertEquals(new \DateTime('2016-05-31'), $computed[4]);
    }
}