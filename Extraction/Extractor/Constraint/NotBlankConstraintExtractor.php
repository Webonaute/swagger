<?php

namespace Draw\Swagger\Extraction\Extractor\Constraint;

use Draw\Swagger\Extraction\Extractor\ConstraintExtractor;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\NotBlank;

class NotBlankConstraintExtractor extends ConstraintExtractor
{
    /**
     * @param Constraint $constraint
     * @return bool
     */
    public function supportConstraint(Constraint $constraint)
    {
        return $constraint instanceof NotBlank;
    }

    /**
     * @param NotBlank $constraint
     * @param ConstraintExtractionContext $context
     */
    public function extractConstraint(Constraint $constraint, ConstraintExtractionContext $context)
    {
        $this->assertSupportConstraint($constraint);
        $context->classSchema->required[] = $context->propertyName;
    }
}