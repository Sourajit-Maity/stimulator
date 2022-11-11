<x-admin-layout title="Waste Scrap Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Waste Scrap List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('waste-scrap.index') }}" value="Waste Scrap List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('waste-scrap.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Waste Scrap
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:waste.waste-list/>
</x-admin-layout>