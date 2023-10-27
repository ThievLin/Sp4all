@extends('template.layout.master')

@section('content')

    @if (!empty($page))

        @if ($page->description)
            @include('template.single_page')


            <!-- position_1 -->
        @elseif(count($page->categories) > 0)
            
            {{-- @if ($key == 0)
                @include('template.banner')
            @endif --}}

            @foreach ($page->categories as $cat)
                @if ($cat->cat_position->position == 'position_1')
                    @if ($cat->block)
                        <?php $tem = $cat->block; ?>
                    @else
                        <?php $tem = 'non'; ?>
                    @endif
                    @include('template.' . $tem)
                @endif
            @endforeach

            <!-- position_2 -->

            @foreach ($page->categories as $cat)
                @if ($cat->cat_position->position == 'position_2')
                    @if ($cat->block)
                        <?php $tem = $cat->block; ?>
                    @else
                        <?php $tem = 'non'; ?>
                    @endif

                    @include('template.' . $tem)
                @endif
            @endforeach

            <!-- position_3 -->

            @foreach ($page->categories as $cat)
                @if ($cat->cat_position->position == 'position_3')
                    @if ($cat->block)
                        <?php $tem = $cat->block; ?>
                    @else
                        <?php $tem = 'non'; ?>
                    @endif
                    @include('template.' . $tem)
                @endif
            @endforeach

            <!-- position_4 -->
            @foreach ($page->categories as $cat)
                @if ($cat->cat_position->position == 'position_4')
                    @if ($cat->block)
                        <?php $tem = $cat->block; ?>
                    @else
                        <?php $tem = 'non'; ?>
                    @endif
                    @include('template.' . $tem)
                @endif
            @endforeach

            <!-- position_5 -->
            @foreach ($page->categories as $cat)
                @if ($cat->cat_position->position == 'position_5')
                    @if ($cat->block)
                        <?php $tem = $cat->block; ?>
                    @else
                        <?php $tem = 'non'; ?>
                    @endif
                    @include('template.' . $tem)
                @endif
            @endforeach


            <!-- position_6 -->
            @foreach ($page->categories as $cat)
                @if ($cat->cat_position->position == 'position_6')
                    @if ($cat->block)
                        <?php $tem = $cat->block; ?>
                    @else
                        <?php $tem = 'non'; ?>
                    @endif
                    @include('template.' . $tem)
                @endif
            @endforeach

            <!-- position_7 -->
            @foreach ($page->categories as $cat)
                @if ($cat->cat_position->position == 'position_7')
                    @if ($cat->block)
                        <?php $tem = $cat->block; ?>
                    @else
                        <?php $tem = 'non'; ?>
                    @endif
                    @include('template.' . $tem)
                @endif
            @endforeach

            <!-- position_8 -->
            @foreach ($page->categories as $cat)
                @if ($cat->cat_position->position == 'position_8')
                    @if ($cat->block)
                        <?php $tem = $cat->block; ?>
                    @else
                        <?php $tem = 'non'; ?>
                    @endif
                    @include('template.' . $tem)
                @endif
            @endforeach

            <!-- position_9 -->
            @foreach ($page->categories as $cat)
                @if ($cat->cat_position->position == 'position_9')
                    @if ($cat->block)
                        <?php $tem = $cat->block; ?>
                    @else
                        <?php $tem = 'non'; ?>
                    @endif
                    @include('template.' . $tem)
                @endif
            @endforeach

            <!-- position_10 -->
            @foreach ($page->categories as $cat)
                @if ($cat->cat_position->position == 'position_10')
                    @if ($cat->block)
                        <?php $tem = $cat->block; ?>
                    @else
                        <?php $tem = 'non'; ?>
                    @endif
                    @include('template.' . $tem)
                @endif
            @endforeach
        @else
            @include('template.non')
        @endif
    @else
        @include('template.non')
    @endif

@endsection
