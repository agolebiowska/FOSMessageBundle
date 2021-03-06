<?php

namespace FOS\MessageBundle\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Message form type for starting a new conversation
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 */
class NewThreadMessageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recipient', 'entity', ['class' => 'AppBundle:User', 'property' => 'getName'])
            ->add('subject', 'text', array('label' => 'subject', 'translation_domain' => 'FOSMessageBundle'))
            ->add('body', 'textarea', array('label' => 'body', 'translation_domain' => 'FOSMessageBundle'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'intention'  => 'message',
        ));
    }

    public function getName()
    {
        return 'fos_message_new_thread';
    }
}
