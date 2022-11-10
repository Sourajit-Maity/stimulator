<x-admin-layout title="Overall Sale Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $overallsale ? 'Edit' : 'Add' }} Overall Sale">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('overall-sale.index') }}" value="Overall Sale List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $overallsale ? 'Edit' : 'Add' }} Overall Sale" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:overallsale.overallsale-create-edit :overallsale="$overallsale"/>
</x-admin-layout>