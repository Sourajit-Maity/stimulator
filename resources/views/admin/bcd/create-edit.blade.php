<x-admin-layout title="Bcd Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $bcd ? 'Edit' : 'Add' }} Bcd">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('bcd.index') }}" value="Bcd List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $bcd ? 'Edit' : 'Add' }} Bcd" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:bcd.bcd-create-edit :bcd="$bcd"/>
</x-admin-layout>