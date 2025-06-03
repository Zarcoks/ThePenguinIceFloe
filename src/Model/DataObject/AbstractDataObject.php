<?php

namespace NDI2023\Model\DataObject;

abstract class AbstractDataObject
{
    public abstract function __toString();

    public abstract function formatTableau(): array;
}
