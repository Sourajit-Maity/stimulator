<x-admin-layout title="CGST Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $cgst ? 'Edit' : 'Add' }} CGST">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('cgst.index') }}" value="CGST List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $cgst ? 'Edit' : 'Add' }} CGST" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:cgst.cgst-create-edit :cgst="$cgst"/>
</x-admin-layout>