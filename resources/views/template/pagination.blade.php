<nav>
    <ul class="pagination">
        <li><a aria-label="Previous"><span aria-hidden="true">«</span></a></li>
        <?php 
            if (isset($categories))
                $pagiNumber = count($categories) / 5 + 1;
            if (isset($products))
                $pagiNumber = count($products) / 5 + 1;
            if (isset($users_all))
                $pagiNumber = count($users_all) / 5 + 1;

        ?>
        @for ($i = 1; $i <= $pagiNumber; $i++)
            <li><a>{{ $i }}</a></li>
        @endfor
        <li><a aria-label="Next"><span aria-hidden="true">»</span></a></li>
    </ul>
</nav>