<?php

namespace App\Http\Livewire\Domestic;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\DutyDomestic;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class DomesticList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchName, $searchSubtype, $searchScrapValue, $searchStatus = -1, $perPage = 5;
    protected $listeners = ['deleteConfirm', 'changeStatus'];

    public function mount()
    {
        $this->perPageList = [
            ['value' => 5, 'text' => "5"],
            ['value' => 10, 'text' => "10"],
            ['value' => 20, 'text' => "20"],
            ['value' => 50, 'text' => "50"],
            ['value' => 100, 'text' => "100"]
        ];
    }
    public function getRandomColor()
    {
        $arrIndex = array_rand($this->badgeColors);
        return $this->badgeColors[$arrIndex];
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }
    public function resetSearch()
    {
        $this->searchName = "";
        $this->searchScrapValue = "";
        $this->searchSubtype = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $dataQuery = DutyDomestic::query();
        if ($this->searchName)
            $dataQuery->orWhere('type', 'like', '%' . $this->searchName . '%');

        if ($this->searchSubtype)
            $dataQuery->orWhere('subtype', 'like', '%' . $this->searchHsn . '%');
        if ($this->searchScrapValue)
            $dataQuery->orWhere('value', 'like', '%' . $this->searchScrapValue . '%');

        return view('livewire.domestic.domestic-list', [
            'datas' => $dataQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        DutyDomestic::destroy($id);
        $this->showModal('success', 'Success', 'Duty Domestic has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this Duty Domestic!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(DutyDomestic $data)
    {
        $data->fill(['active' => ($data->active == 1) ? 0 : 1])->save();

        $this->showModal('success', 'Success', 'Duty Domestic status has been changed successfully');
    }
}
    