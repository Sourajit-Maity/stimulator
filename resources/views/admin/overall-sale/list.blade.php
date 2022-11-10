<x-admin-layout title="Overall Sale Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Overall Sale List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('overall-sale.index') }}" value="Overall Sale List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('overall-sale.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Sale
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:overallsale.overallsale-list/>
</x-admin-layout>