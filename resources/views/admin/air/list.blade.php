<x-admin-layout title="Air Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Air List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('air.index') }}" value="Air List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('air.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Air
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:air.air-list/>
</x-admin-layout>