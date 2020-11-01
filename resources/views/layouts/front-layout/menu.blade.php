<!-- menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container items-center justify-between">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="mr-auto navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                @foreach ($Categories as $category)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $category->Cat_name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($category->frontCategory as $subcat)
                        @if ($subcat->status == 1)
                        <a class="dropdown-item" href="#">
                            @if (empty($subcat->Cat_name))
                                <span class="p-2 text-red-500">No Data To Show </span>
                            @endif
                            {{ $subcat->Cat_name }}
                        </a>
                        @endif
                        @endforeach
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
