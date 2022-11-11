<x-admin-layout title="Waste Scrap Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $waste ? 'Edit' : 'Add' }} Waste Scrap">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('waste-scrap.index') }}" value="Waste Scrap List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $waste ? 'Edit' : 'Add' }} Waste Scrap" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:waste.waste-create-edit :waste="$waste"/>
</x-admin-layout>