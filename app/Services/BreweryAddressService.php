<?php

namespace App\Services;

class BreweryAddressService
{
    private $itemList = [
        'street',
        'city',
        'state',
        'postal_code',
        'country'
    ];

    /**
     * [separateAddres description]
     * @param  array $breweryData [description]
     * @return array              [description]
     */
    public function separateAddres(array $breweryData): array
    {
        $addresItemArray = [];

        foreach ($breweryData as $breweryItemName => $breweryItemValue ) {
            if (\in_array($breweryItemName, $this->itemList)) {
                $addresItemArray[$breweryItemName] = $breweryItemValue;
                unset($breweryData[$breweryItemName]);
            }
        }

        $breweryData['address'] = $addresItemArray;

        return $breweryData;
    }

    /**
     * [separateAddreses description]
     * @param  string $breweryData [description]
     * @return string              [description]
     */
    public function separateAddreses(string $breweryData): string
    {
        $newBreweriesDataArray = [];
        $breweryDataArray = \json_decode($breweryData, true);

        if (is_array($breweryDataArray) && array_diff_key($breweryDataArray,array_keys(array_keys($breweryDataArray)))) {
          $newBreweriesDataArray[] = $this->separateAddres($breweryDataArray);

          return \json_encode($newBreweriesDataArray);
        }

        foreach ($breweryDataArray as $breweryData) {
            $newBreweriesDataArray[] = $this->separateAddres($breweryData);
        }

        return \json_encode($newBreweriesDataArray);
    }
}
