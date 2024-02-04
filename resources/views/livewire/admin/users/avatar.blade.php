<div class="rounded-full overflow-hidden w-10">
    <img class="w-full"
        src="{{ \Str::contains('https://', $this->model->avatar) || \Str::contains('http://', $this->model->avatar) ? \Storage::url($this->model->avatar) : $this->model->avatar }}"
        alt="{{ $this->model->username }}">
</div>
