<div class="col-xl-3 order-xl-0 order-1 mb-3">

    <div class="card pcountry cati  p-3 mb-3">
        <div class="d-flex flex-row justify-content-between bg-light py-2 px-4 my-2 bright radius15">
            <h2>دسته بندی ها</h2>
            <a href="#">- بیشتر -</a>
        </div>

        <ul class="list-unstyled">
            @foreach ($categoris as $category)
                <li><a href="{{ Route('category.show', ['id' => $category->id]) }}"><img
                            src=" {{ asset('assets/Img/cati/img_2.jpg') }}" class="ml-2" /><span>{{ $category->title }}
                        </span></a></li>
            @endforeach
        </ul>
    </div>
    <div class="card thumb-post p-3 mb-3">
        <h2 class="bg-light py-2 px-4 mt-2 mb-4 bright radius15">آخرین مطالب</h2>
        <ul class="fa12">
            @foreach ($latestArticles as $latestArticle)
                <li>
                    <div class="d-flex flex-row">
                        <a href="{{ Route('singlePage', ['id' => $latestArticle->id]) }}"><img
                                src=" {{ asset('article/images/' . $latestArticle->image) }}" /></a>
                        <div class="m-2">
                            <p><a
                                    href="{{ Route('singlePage', ['id' => $latestArticle->id]) }}">{{ $latestArticle->title }}</a>
                            </p>
                            <span>{{ $latestArticle->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
</div>
