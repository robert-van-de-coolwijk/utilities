<?php

namespace spec\CPB\Utilities\Common
{
    use CPB\Utilities\Common\Collection;
    use PhpSpec\ObjectBehavior;

    class CollectionSpec extends ObjectBehavior
    {
        public function it_is_initializable()
        {
            $this->shouldHaveType(Collection::class);
        }

        public function it_is_stattically_initializable()
        {
            $this::From([])->shouldHaveType(Collection::class);
        }

        public function it_is_castable_to_array()
        {
            $this->ToArray()->shouldBeArray();
        }

        public function it_is_iterable()
        {
            $this->getIterator()->shouldHaveType(\Generator::class);
        }

        public function it_is_sortable()
        {
            $sorted = $this::From([ 21, 42, -38 ])->Sort();

            $sorted->shouldHaveKeyWithValue(0, -38)
            $sorted->shouldHaveKeyWithValue(1, 21)
            $sorted->shouldHaveKeyWithValue(2, 42);
        }

        public function it_is_joinable()
        {
            $this::From([ 'one', 'two', 'three' ])
                ->Join(',')
                ->shouldReturn('one,two,three');
        }

        public function it_is_countable()
        {
            $this::From([ 'one', 'two', 'three' ])
                ->shouldHaveCount(3);
        }

        public function it_can_create_items()
        {
            $this['one'] = 1;
            $this['two'] = 2;
            $this['three'] = 3;

            $this->shouldHaveKeyWithValue('one', 1);
            $this->shouldHaveKeyWithValue('two', 2);
            $this->shouldHaveKeyWithValue('three', 3);
        }

        public function it_can_create_a_power_set()
        {
            $set = $this::From([ 'One', 'Two', 'Three' ])->PowerSet();

            $this->shouldContain('One');
            $this->shouldContain('oneTwo');
            $this->shouldContain('oneThree');
            $this->shouldContain('oneTwoThree');
            $this->shouldContain('Two');
            $this->shouldContain('TwoThree');
            $this->shouldContain('Three');
        }

        public function it_can_read_items()
        {
            $this::From([
                'one',
                'two',
                'three',
            ])[1]->shouldReturn('two');
        }
    }
}
