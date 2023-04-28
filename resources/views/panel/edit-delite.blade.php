<td class="project-actions text-right">
    <a class="btn btn-info btn-sm"
       href="{{route('post.edit', $post)}}">
        <i class="fas fa-pencil-alt">
        </i>
        Изменить
    </a>
    <form action="{{route('post.destroy', $post)}}"
          method="POST" style="display: inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" href="#">
            <i class="fas fa-trash">
            </i>
            Удалить
        </button>
    </form>
</td>
