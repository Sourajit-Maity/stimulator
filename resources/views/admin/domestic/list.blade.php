<x-admin-layout title="Domestic Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Domestic List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('domestic.index') }}" value="Domestic List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('domestic.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Domestic List
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:domestic.domestic-list/>
</x-admin-layout>