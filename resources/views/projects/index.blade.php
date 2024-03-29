@include('layouts.navbar')

<div class="w-9/12 rounded-lg justify-center mx-auto border-2 mt-8">
    <h1
        class="font-bold border-2 font-sans text-transparent text-2xl bg-clip-text
        bg-gradient-to-r from-gray-700 to-blue-800">
        PROJECTS
    </h1>
</div>

<div class="w-9/12 rounded-lg justify-center mx-auto border-2 mt-8 bg-amber-200">
    @if (session()->has('success'))
        <div class="alert alert-success mt-3 font-sans text-gray-700 text-2xl">
            {{ session('success') }}
        </div>
    @endif
</div>

<div class="w-9/12 rounded-lg justify-center mx-auto border-2 mt-8">

    <table class="w-full whitespace-nowrap">
        <tbody>
            @foreach ($projects as $project)
                <tr tabindex="0" class="focus:outline-none h-16 mb-16">
                    <td class="">
                        <div class="flex items-start">
                            <p class="text-base font-medium leading-none text-gray-700   mr-2">
                                {{ $project->name }}
                            </p>
                        </div>
                    </td>
                    <td class="">
                        <div class="flex items-start">
                            <p class="text-base font-medium leading-none text-gray-700   mr-2">
                                {{ $project->description }}
                            </p>
                        </div>
                    </td>
                    <td class="">
                        <div class="flex items-start">
                            <p class="text-base font-medium leading-none text-gray-700   mr-2">
                                {{ $project->status }}
                            </p>
                        </div>
                    </td>
                    <td class="">
                        <div class="flex items-start">
                            <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                {{ $project->stages()->where('status', \App\Enums\StageStatus::Completed)->count() }}
                            </p>
                        </div>
                    </td>

                    <td class="">
                        <div class="">
                            <p class="text-sm leading-none text-gray-600 mb-2">
                                @if ($project->stages->count() !== 0)
                                    @php
                                        $completedStages = $project
                                            ->stages()
                                            ->where('status', \App\Enums\StageStatus::Completed)
                                            ->count();
                                        $percentage = ($completedStages / $project->stages->count()) * 100;
                                    @endphp
                                    {{ $percentage }}% Complete.
                                @else
                                    0% Complete.
                                @endif
                            </p>
                            <div class="w-full bg-gray-200 h-1">
                                @php
                                    $completedStages = $project
                                        ->stages()
                                        ->where('status', \App\Enums\StageStatus::Completed)
                                        ->count();
                                    $percentage = $project->stages->count() !== 0 ? ($completedStages / $project->stages->count()) * 100 : 0;
                                @endphp
                                <div class="bg-blue-600 h-1" style="width: {{ $percentage }}%">
                                    {{ $percentage }}% Complete.
                                </div>
                            </div>
                        </div>
</div>
</td>

<td class="">
    <div class="flex items-center -space-x-3">
        <div
            class='h-10 w-10 text-xs rounded-full bg-gray-100 font-bold text-gray-800 border-2 border-blue-accent-400 text-center flex items-center justify-center'>
            <span>
                A
            </span>
        </div>

    </div>
</td>
<td class="pl-5">
    <div class="flex items-center">
        <p class="text-sm leading-none text-gray-600   ml-2">
            {{ $project->created_at }}</p>
    </div>
</td>
<td class="pl-4 flex space-x-3 py-3">

    <a href='{{ route('projects.show', $project->id) }}'>
        <x-table-button>
            View
        </x-table-button>
    </a>

    <a href='{{ route('projects.edit', $project->id) }}'>
        <x-table-button>
            Edit
        </x-table-button>
    </a>

    <form method="post" action="{{ route('projects.destroy', $project->id) }}"
        onsubmit="return confirm('Are You Sure Want To Delete ?');">
        @csrf
        @method('DELETE')
        <x-table-button>
            Delete
        </x-table-button>
    </form>

</td>

</tr>
@endforeach
</tbody>
</table>
</div>

<div class="w-9/12 rounded-lg justify-center mx-auto mt-8 ">
    <a href="{{ route('projects.create') }}">
        <x-page-button>
            Create
        </x-page-button>
    </a>

</div>
