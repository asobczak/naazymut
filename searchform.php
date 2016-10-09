<style>
    .search-input {
        width: 220px;
        margin: 10px 0px;
    }

    .search-form {
        margin: 0px;
    }

    .glyphicon-search {
        margin: 0px -10px;
    }

    .submit-btn {
        height: 34px;
    }
</style>

<form class="search-form navbar-right" action="/" method="get">
    <div class="input-group search-input">
        <input type="text" class="form-control" placeholder="Szukaj" name="s" value="<?php the_search_query(); ?>" />
        <input type="hidden" value="post" name="post_type" id="post_type" />
        <span class="input-group-btn">
            <button type="submit" class="btn btn-default submit-btn">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
        </span>
    </div>
</form>