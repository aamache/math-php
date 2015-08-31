<?php

/*
 * This file is part of the fubhy/math-php package.
 *
 * (c) Sebastian Siemssen <fubhy@fubhy.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fubhy\Math\Token\Operator;

use Fubhy\Math\Token\BaseToken;
use Fubhy\Math\Token\NumberToken;

/**
 * Token class for the '-' operator.
 *
 * @author Sebastian Siemssen <fubhy@fubhy.com>
 */
class MinusToken extends BaseToken implements OperatorTokenInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getRegexPattern()
    {
        return '\-';
    }

    /**
     * {@inheritdoc}
     */
    public function getPrecedence()
    {
        return 0;
    }

    /**
     * {@inheritdoc}
     */
    public function getAssociativity()
    {
        return OperatorTokenInterface::ASSOCIATIVITY_LEFT;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(&$stack)
    {
        $a = array_pop($stack);
        $b = array_pop($stack);
        $result = $b->getValue() - $a->getValue();
        return new NumberToken($b->getOffset(), $result);
    }
}
