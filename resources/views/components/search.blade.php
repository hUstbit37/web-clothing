<style>
    div.item input[type='text'] {
        border: navajowhite;
        padding: 10px;
        border-radius: 15px;
    }
    select{

    }
</style>
<form action="">
    <div class="filter">
        <div class="item">
            <button>Mới nhất</button>
        </div>
        <div class="item">
            <button>Bán chạy</button>
        </div>
        <div class="item">
            <select name="" id="">
                <option value="">Giá</option>
                <option value="1">Tăng dần</option>
                <option value="2">Giảm dần</option>
            </select>
        </div>
        <div class="item">
            <select name="" id="d">
                <option value="">Chọn danh mục</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name  }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="item">
            <button type="submit">Lọc</button>
        </div>
    </div>
</form>

