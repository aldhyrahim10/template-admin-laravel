@extends('layouts.front')

@section('content')
<div class="container">
  <div class="mt-5">
    <h1 class="text-center">
      Articles
    </h1>
    <p class="text-center mt-2">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. 
      <br>
      Asperiores delectus nihil impedit consequatur dolor exercitationem ipsa a ipsam cumque 
  </div>

  <div class="form-search mt-5">
    <input type="text" class="form-control" style="width: 60%; margin: auto; height: 60px;" placeholder="Search Articles...">
  </div>

  <div class="courses-all mt-5 row">
    @forelse ($articles as $item)
      <div class="col-lg-3 mt-4 item-content">
        <a href="{{ route('articles-detail-page', $item->id) }}" style="text-decoration: none;">
          <div class="card-product shadow">
            <img src="{{ Storage::url($item->article_image) }}" width="100%" height="200px" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="">
            <div class="card-content p-2">
              <h4 class="title">
                {{ $item->article_title }}
              </h4>
              <p class="category">
                {{ $item->category->article_category_name }}
              </p>
              <p >
                {!! $item->article_description !!}
              </p>
            </div>
          </div>
        </a>
      </div>
    @empty
      <div class="col-lg-12">
        <div class="alert alert-danger">
          Data not found
        </div>
      </div>
    @endforelse

    <div class="empty-list" style="display: none">
      <div class="col-lg-12 no-results alert alert-danger">Data not found</div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
        $('.form-control').on('keyup', function () {
            var searchValue = $(this).val().toLowerCase();

            if (searchValue === '') {
                $('.item-content').show();
                $(".empty-list").hide();

            } else {
                var visibleCount = 0;

                $('.item-content').each(function () {
                    var courseName = $(this).find('.title').text().toLowerCase();

                    if (courseName.indexOf(searchValue) > -1) {
                        $(this).show();
                        visibleCount++;
                    } else {
                        $(this).hide();
                        visibleCount = 0;
                    }
                });

                if (visibleCount === 0) {
                    $(".empty-list").show();
                } else {
                    $(".empty-list").hide();
                }
            }


        });
    });
</script>
@endsection